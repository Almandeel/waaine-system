    <!-- Modal -->
    <div class="modal fade" id="hallModal" tabindex="-1" role="dialog" aria-labelledby="hallModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    @if(request()->type == 1)
                        <h4 class="modal-title" id="hallModalLabel">اضافة فندق</h4>
                    @else 
                        <h4 class="modal-title" id="hallModalLabel">اضافة صالة</h4>
                    @endif
                </div>
                <form id="form_hall" action="{{ route('halls.store') }}" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="modal-body">

                        <div class="form-group">
                            <label>الاسم</label>
                            <input type="text" class="form-control" name="name" placeholder="الاسم" required>
                        </div>

                        <div class="form-group">
                            <label>العنوان</label>
                            <input type="text" class="form-control" name="address" placeholder="العنوان" required>
                        </div>

                        <div class="form-group">
                            <label>رقم الهاتف</label>
                            <input type="number" class="form-control" name="phone" placeholder="رقم الهاتف" required>
                        </div>

                        <div class="form-group">
                            <label>خط الطول  </label>
                            <input type="text" class="form-control" name="longitude" placeholder="خط الطول " required>
                        </div>

                        <div class="form-group">
                            <label>خط العرض</label>
                            <input type="text" class="form-control" name="latitude" placeholder="خط العرض" required>
                        </div>

                        <div class="form-group">
                            <label class="btn btn-primary btn-block">
                                الصورة
                                <input type="file" class="form-control d-none" name="image">
                            </label>
                        </div>

                        <div class="form-group">
                            <label>الوصف</label>
                            <textarea cols="5" rows="5" class="form-control" name="description" placeholder="الوصف" ></textarea>
                        </div>

                        <input type="hidden" name="type" value="{{ request()->type }}">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<script>

$('.hall').click(function() {

	if($(this).hasClass("update")){
        $('#form_hall').attr('action', $(this).data('action'))
        $('#form_hall').append('<input type="hidden" name="_method" value="PUT">')

        @if(request()->type == 1)
            $('.modal-title').text('تعديل فندق')
        @else 
            $('.modal-title').text('تعديل صالة')

        @endif

        //set data to inputs
        $('#form_hall input[name="name"]').val($(this).data('name'))
        $('#form_hall input[name="phone"]').val($(this).data('phone'))
        $('#form_hall input[name="address"]').val($(this).data('address'))
        $('#form_hall textarea[name="description"]').val($(this).data('description'))
        $('#form_hall input[name="longitude"]').val($(this).data('longitude'))
        $('#form_hall input[name="latitude"]').val($(this).data('latitude'))

    }else {
        $('#form_items').attr('action', '{{ route("halls.store") }}' )
        @if(request()->type == 1)
            $('.modal-title').text('اضافة فندق')
        @else 
            $('.modal-title').text('اضافة صالة')

        @endif
        
        //delete data from inputs
        $('#form_hall input[name="name"]').val('')
        $('#form_hall input[name="phone"]').val('')
        $('#form_hall input[name="address"]').val('')
        $('#form_hall input[name="longitude"]').val('')
        $('#form_hall input[name="latitude"]').val('')
    }

            

})
</script>