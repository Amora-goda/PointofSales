<!-- Deleted categories -->
<div class="modal fade" id="Deleted{{$categorie->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف القسم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('categories.destroy',$categorie->id)}}" method="post">
                    @method('DELETE')
                    @csrf

                    <div class="row">
                        <div class="col">
                            <label class="text-danger h6">هل انت متأكد من عمليه الحذف ؟</label>
                            <input type="text" value="{{$categorie->name}}" readonly class="form-control">
                        </div>
                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        <button class="btn btn-primary">حفظ</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
