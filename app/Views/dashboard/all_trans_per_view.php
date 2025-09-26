<style>
    .sales-chart-main-wrap {
        padding: 0 5px;
        margin: 0;
    }


    .sales-chart-sec:hover {
        border: 2px solid #003399 !important;
        box-shadow: 0 0.25rem 1.125rem rgb(75 70 92 / 9%);
    }

    .sales-chart-main-wrap .sales-chart-sec:last-child {
        margin-right: 0px;
    }

    .sales-bar-chart-main-wrap {
        border: 1px solid #d5ebf5;
        border-radius: 6px;
        padding: 1px;
        margin: 1px 0;
        box-shadow: 0 0.25rem 1.125rem rgba(75, 70, 92, .1);
        -webkit-box-shadow: 0 0.25rem 1.125rem rgba(75, 70, 92, .1);
        -moz-box-shadow: 0 0.25rem 1.125rem rgba(75, 70, 92, .1);
    }

    .sales-chart-sec {
        border: 2px solid #027eff4a !important;
        width: calc(30% - 10px);
        border-radius: 11px !important;
        box-shadow: 0 0.25rem 1.125rem rgba(75, 70, 92, .1);

    }

    .sales-chart-sec {
        margin: 2px 5px;
    }

    .sales-chart-secs {
        border: 2px solid #027eff4a !important;
        width: calc(70% - 10px);
        border-radius: 11px !important;
        box-shadow: 0 0.25rem 1.125rem rgba(75, 70, 92, .1);

    }

    .sales-chart-secs {
        margin: 2px 5px;
    }

    .sales-chart-head {
        font-size: 15px;
        font-weight: bold;
        border-bottom: 2px solid #17a2b8;
        margin-bottom: 10px;
        padding-bottom: 10px;
    }

    .rep-title {
        font-size: 17px;
        color: #0099CC;
        font-weight: bold;
        /* padding-left: 15px; */
        /* padding-left: 0; */
        padding-left: 26px;
    }
</style>
<style>
    ul,
    #myUL {
        list-style-type: none;
    }

    #myUL {
        margin: 0;
        padding: 0;
    }

    .caret {
        cursor: pointer;
        -webkit-user-select: none;
        /* Safari 3.1+ */
        -moz-user-select: none;
        /* Firefox 2+ */
        -ms-user-select: none;
        /* IE 10+ */
        user-select: none;
    }

    .caret::before {
        content: "\25B6";
        color: black;
        display: inline-block;
        margin-right: 6px;
    }

    .caret-down::before {
        -ms-transform: rotate(90deg);
        /* IE 9 */
        -webkit-transform: rotate(90deg);
        /* Safari */
        '
 transform: rotate(90deg);
    }

    .nested {
        display: none;
    }

    .active {
        display: block;
    }

    a {
        text-decoration: none;
    }
</style>
<style>
    table.dataTable td,
    th {
        font-size: .7em;
        border-bottom-width: 0px;
    }

    .table>:not(caption)>*>* {
        padding: .1rem .5rem;
    }

    div.container {
        width: 80%;
    }
</style>
                    <div class="col-12">
                        <div class="row">
                           
                            <div class="col-md-12 sales-chart-sec">
                                <ul id="myUL">
                                    <?php
                                     foreach($parent_menu as $key1 => $val1){
                                        $pid = $val1['entity_trans_id']; ?>
                                        <li><span class="caret"><a href="#" class="system_user_search" data-id="<?php echo $pid; ?>"><?php echo $val1['entity_trans_name']; ?></a></span>
                                            <ul class="nested">
                                                <?php
                                                foreach($sub_menu as $key2 => $val2){ 
													if($val1['entity_trans_id'] == $val2['prs_parent_id']){
                                                    $eid = $val2['entity_trans_id']; ?>
                                                    <li><span class="caret"><a href="#" class="system_user_search" data-id="<?php echo $eid; ?>"><?php echo $val2['entity_trans_name']; ?></a>

                                                    </li>
                                                <?php } } ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="col-md-12 sales-chart-secs">
                                <div id="permissiondiv">
                                    <div class="form-row">
                                        <div class="form-group col-md">
                                            <label for="add_checkbox">ADD</label>

                                        </div>
                                        <div class="form-group col-md">
                                            <label for="modify_checkbox">MODIFY</label>

                                        </div>
                                        <div class="form-group col-md">
                                            <label for="delete_checkbox">DELETE</label>

                                        </div>
                                        <div class="form-group col-md">
                                            <label for="view_checkbox">VIEW</label>

                                        </div>
                                        <div class="form-group col-md">

                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="add_permission" name="add_permission" onclick="valuechange('add_permission')">
                                            </div>
                                        </div>
                                        <div class="form-group col-md">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="modify_permission" name="modify_permission" onclick="valuechange('modify_permission')">
                                            </div>
                                        </div>
                                        <div class="form-group col-md">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="delete_permission" name="delete_permission" onclick="valuechange('delete_permission')">
                                            </div>
                                        </div>
                                        <div class="form-group col-md">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="active_or_inactive" name="active_or_inactive" onclick="valuechange('active_or_inactive')">
                                            </div>
                                        </div>
                                        <div class="form-group col-md">
                                            <input type="hidden" id="hidden_role_id">
                                            <input type="hidden" id="hidden_menu_id">
                                            <input type="hidden" id="hidden_rolepermission_id">
                                            <button type="submit" id="role_permission_submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                
<script>
    var toggler = document.getElementsByClassName("caret");
    var i;

    for (i = 0; i < toggler.length; i++) {
        toggler[i].addEventListener("click", function() {
            this.parentElement.querySelector(".nested").classList.toggle("active");
            this.classList.toggle("caret-down");
        });
    }
</script>
