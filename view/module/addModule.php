<script src="./css/js/addModule.js"></script>
<div class="container">
    <form method="post" action="index.php?controller=module&action=createModule" id="formModule">
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
                    <input type="number" id="componentsNumber" name="componentsNumber" onchange="formGenerator(value)" min="0" required/>
                </div>
            </div>
        </fieldset>
    </form>
</div>