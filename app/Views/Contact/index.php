<div class="col-lg-1"></div>
<div class="col-lg-4">
    <h3>Contact</h3>

    <form action="contact/create" method="post" enctype="multipart/form-data">
        
        <fieldset class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
        </fieldset>

        <fieldset class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number">
        </fieldset>

        <fieldset class="form-group">
            <label for="text_area">Textarea</label>
            <textarea class="form-control" id="text_area" name="text_area" rows="3"></textarea>
        </fieldset>

        <fieldset class="form-group">
            <label for="myfile">File input</label>
            <input type="file" class="form-control-file" id="myfile" name="myfile">
            <small class="text-muted">Upload your file here.</small>
        </fieldset>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</div>