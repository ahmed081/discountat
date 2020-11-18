<div class="modal fade" id="{{"deletecategory".$category->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Delete Category</h5>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/categories/desable/{{$category->id}}" method="POST">
                @csrf
                <div class="modal-body">
                    
                        <div>
                            <p>
                                Deleting this category will not remove all the imforamtion from our database.
                                <br>
                                ps : You can undo it by enabling the category
                            </p>
                        </div>
                        
                    
                </div>
                <div class="modal-footer">
                    <button type="button" style="background: white; border-radius: 17px; width: 80px; height: 40px; color:red;border: 1px solid ;red" class="btn" data-dismiss="modal">Cancel</button>
                    <button type="submit" style="background: red; border-radius: 17px; width: 180px; height: 40px; color: white;"  class="btn">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>