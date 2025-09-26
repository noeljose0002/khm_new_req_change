<?php

namespace App\Models;

use CodeIgniter\Model;

class WhatsappTextMessageModel extends Model
{
    protected $table            = 'khm_obj_mst_whatsapp_text_message';
    protected $primaryKey       = 'whatsapp_text_message_id';
    protected $allowedFields    = [
        'object_id', 
        'template_name', 
        'template_content', 
        'deleted', 
        'enterprise_id'
    ];
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    /**
     * Get all active (non-deleted) WhatsApp text messages.
     */
    public function getActiveMessages()
    {
        return $this->where('deleted', 0)
                    ->orderBy('whatsapp_text_message_id', 'DESC')
                    ->findAll();
    }
    
    /**
     * Insert a new WhatsApp text message record.
     * This also inserts a corresponding record into khm_obj_mst
     * with object_type=5 and object_class=17.
     */
    public function insertMessage($templateName, $templateContent, $enterpriseId)
    {
        $db = \Config\Database::connect();

        // 1) Insert into khm_obj_mst master table
        $builderObj = $db->table('khm_obj_mst');
        $dataObj = [
            'object_type_id'   => 5,
            'object_class_id'  => 17,
            'object_name'      => $templateName, // Using template name as object name
            'deleted'       => 0,
            'enterprise_id'    => $enterpriseId
        ];
        $builderObj->insert($dataObj);
        $objectId = $db->insertID();

        // 2) Insert into khm_obj_mst_whatsapp_text_message
        $data = [
            'object_id'        => $objectId,
            'template_name'    => $templateName,
            'template_content' => $templateContent,
            'deleted'          => 0,
            'enterprise_id'    => $enterpriseId
        ];
        return $this->insert($data);
    }

    /**
     * Update an existing WhatsApp text message record.
     * Also updates the corresponding record in khm_obj_mst.
     */
    public function updateMessage($id, $templateName, $templateContent, $enterpriseId)
    {
        // Update this table
        $this->update($id, [
            'template_name'    => $templateName,
            'template_content' => $templateContent,
            'enterprise_id'    => $enterpriseId
        ]);

        // Update corresponding master record in khm_obj_mst
        $db  = \Config\Database::connect();
        $row = $this->find($id);
        if ($row && isset($row['object_id'])) {
            $objectId   = $row['object_id'];
            $builderObj = $db->table('khm_obj_mst');
            $builderObj->where('object_id', $objectId)
                       ->update(['object_name' => $templateName]);
        }
        return true;
    }

    /**
     * Soft-delete a WhatsApp text message record.
     * Also mark the corresponding master record as deleted.
     */
    public function softDeleteMessage($id)
    {
        // Soft-delete in WhatsApp text message table
        $this->update($id, ['deleted' => 1]);

        // Soft-delete in khm_obj_mst table
        $db  = \Config\Database::connect();
        $row = $this->find($id);
        if ($row && isset($row['object_id'])) {
            $objectId   = $row['object_id'];
            $builderObj = $db->table('khm_obj_mst');
            $builderObj->where('object_id', $objectId)
                       ->update(['deleted' => 1]);
        }
        return true;
    }
}
