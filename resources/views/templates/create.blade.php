<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template / Create</title>
</head>
<body>

<div class="card-body">
    <form id="templateFormId" method="POST" action="{{ route('templates.store') }}" enctype="multipart/form-data">
        @csrf

 <div id="section6" style="display: none;">
    <div class="card-header bg-dark text-white">
        <h7 class="mb-0">{{ __('Templates') }}</h7>
    </div> <br>
        
    <div id="templates">
        <div class="template">
        <!-- Input fields for template information -->
        </div>
    </div>

    <button type="button" id="addTemplate">Add Template</button><br><br>

    <!-- Buttons -->
    <div class="form-group mt-5 d-flex justify-content-between">
        <a href="{{ route('templates.index') }}" class="btn btn-danger"><i class="fas fa-times-circle mr-1"></i>{{ __('Cancel') }}</a>
        <button type="reset" class="btn btn-warning"><i class="fas fa-sync-alt mr-1"></i>{{ __('Reset') }}</button>
        <button type="submit" class="btn btn-success"><i class="fas fa-check-circle mr-1"></i>Submit</button>
    </div>
</div>


<script>
    let templateIndex = 1; // Initialize the template index

    // Function to add a new template field
    function addTemplateField() {
        let templatesContainer = document.getElementById('templates');
        let newTemplateIndex = templatesContainer.children.length;
        let newTemplate = document.createElement('div');
        newTemplate.className = 'template';
        newTemplate.innerHTML = `
            <div class="template-fields">
                <div class="card-header bg-primary text-white">
                    <h7 class="mb-0">{{ __('Template') }} ${templateIndex}</h7>
                    <button type="button" class="close" aria-label="Close" onclick="removeTemplateField(this)">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div><br>
               
                <div class="form-group">
                    <label for="title_text">{{ __('Middle Name') }}</label>
                    <input type="text" name="templates[${newTemplateIndex}][title_text]" class="form-control" placeholder="Title" required>
                </div>
                
            </div>
        `;
        templatesContainer.appendChild(newTemplate);
        templateIndex++; // Increment the template index for the next template
    }

    // Function to remove a template field
    function removeTemplateField(button) {
        let templateField = button.parentElement.parentElement;
        templateField.remove();
    }

    document.getElementById('addTemplate').addEventListener('click', addTemplateField);
</script> 