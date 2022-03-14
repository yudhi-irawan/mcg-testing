	<div id="dlg_one" class="easyui-dialog" style="height:px;width:px;padding:10px 20px"
            closed="true" buttons="#dlg_one_buttons">
        <div class="ftitle">Data Information</div>
        <form id="fm_one" method="post" novalidate>
            <div class="fitem" hidden="true">
                <label>Emp ID :</label>
                <input id="emp_id" name="emp_id" class="easyui-textbox" style="height:25px;width:300px">
            </div>
            <div class="fitem">
                <label>Emp Name :</label>
                <input id="emp_name" name="emp_name" class="easyui-textbox" style="height:25px;width:300px" required="true">
            </div>
            <div class="fitem">
                <label>Birth Day :</label>
                <input id="emp_bday" name="emp_bday" class="easyui-datebox" data-options="formatter:formatDateInput,parser:parserDateInput" style="height:25px;width:300px" required="true">
            </div>
            <div class="fitem">
                <label>Sex ID :</label>
                <input id="sex_id" name="sex_id" class="easyui-textbox" style="height:25px;width:300px" required="true">
            </div>
            <div class="fitem">
                <label>Edu Code :</label>
                <input id="edu_code" name="edu_code" class="easyui-textbox" style="height:25px;width:300px" required="true">
            </div>
        </form>
    </div>
