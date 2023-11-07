<% if Items.Count %>
<div class="container">
    <div class="row justify-content-center my-5">

        <div class="col-md-8">
            <div class="accordion" id="brandsblock-{$Top.ID}">
                <% loop Items %>
                    <% if not Disabled %>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#brandsblock-{$Top.ID}-item-{$ID}" aria-expanded="false" aria-controls="brandsblock-{$Top.ID}-item-{$ID}">$Title</button>
                        </h2>
                    <div id="brandsblock-{$Top.ID}-item-{$ID}" class="accordion-collapse collapse" data-bs-parent="#brandsblock-{$Top.ID}">
                        <div class="accordion-body">$Image.URL - $Image.Title</div>
                        </div>
                    </div>
                    <% end_if %>
                <% end_loop %>
            </div>
        </div>

    </div>
</div>
<% end_if %>
