<div class="container">
    <form method="post" action="index.php?controller=module&action=createModule">
        <fieldset>
            <legend>Module Title</legend>
            <div class="form-group">
                <label for="Title" class="col-sm-2 control-label">Module Title</label>
                <input type="text" placeholder="Title" name="Title" id="Title" required/>
            </div>
            <div>
                <label for="componentsNumber">Number of components</label>
                <input type="number" id="componentsNumber" name="componentsNumber" required/>
            </div>
        </fieldset>
        <fieldset>
            <legend>First component</legend>
            <div>
                <label for="examType" class="col-sm-2 control-label">Type of exam</label>
                <select id="examType" name="examType" required>
                    <option>Assignment</option>
                    <option>Lab Tests</option>
                    <option>Written Exam</option>
                </select>
            </div>
            <div>
                <label for="examType" class="col-sm-2 control-label">Type of exam</label>
                <input type="date" id="examDate" name="examDate" value="<?php date("d/m/Y") ?>"
                       min="<?php date("d/m/Y") ?>"
                       max="31/12/2999"/>
            </div>
            <div>
                <label for="ratio" class="col-sm-2 control-label">Type of exam</label>
                <input type="number" id="ratio" name="ratio" placeholder="100"/>
            </div>
        </fieldset>
    </form>
</div>