<div class="container">
    <form method="post" action="index.php?controller=module&action=createModule">
        <fieldset>
            <legend>Module Title</legend>
            <div class="form-group row">
                <label for="Title" class="col-sm-2 col-form-label">Module Title</label>
                <div class="col-sm-10">
                    <input type="text" placeholder="Title" name="Title" id="Title" required/>
                </div>
            </div>
            <div class="form-group row">
                <label for="componentsNumber" class="col-sm-2 col-form-label">Number of components</label>
                <div class="col-sm-10">
                    <input type="number" id="componentsNumber" name="componentsNumber" required/>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>First component</legend>
            <div class="form-group row">
                <label for="examType" class="col-sm-2 col-form-label">Type of exam</label>
                <div class="col-sm-10">
                    <select id="examType" name="examType" required>
                        <option>Assignment</option>
                        <option>Lab Tests</option>
                        <option>Written Exam</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="examType" class="col-sm-2 col-form-label">Type of exam</label>
                <div class="col-sm-10">
                    <input type="date" id="examDate" name="examDate" value="<?php date("d/m/Y") ?>"
                           min="<?php date("d/m/Y") ?>"
                           max="31/12/2999"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="ratio" class="col-sm-2 col-form-label">Type of exam</label>
                <div class="col-sm-10">
                    <input type="number" id="ratio" name="ratio" placeholder="100"/>    
                </div>
            </div>
        </fieldset>
    </form>
</div>