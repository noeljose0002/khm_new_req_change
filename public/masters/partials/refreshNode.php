<!-- app/Views/partials/refreshNode.php -->
<?php if (!empty($children)): ?>
    <ul class="list-group nested-ul">
    <?php foreach ($children as $child): ?>
        <li class="list-group-item">
            <a href="#" class="nav-link level-node" 
               data-id="<?= esc($child['geog_id']) ?>" 
               data-parentid="<?= esc($child['geog_parent_id']) ?>" 
               data-name="<?= esc($child['geog_name']) ?>" 
               data-lat="<?= esc($child['geog_latitude']) ?>" 
               data-lng="<?= esc($child['geog_longitude']) ?>">
                <?= esc($child['geog_name']) ?>
            </a>
        </li>
    <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No child nodes available.</p>
<?php endif; ?>
