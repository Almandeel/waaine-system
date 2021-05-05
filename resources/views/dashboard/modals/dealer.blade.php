    <!-- Modal -->
    <div class="modal fade" id="DealerModal" tabindex="-1" role="dialog" aria-labelledby="DealerModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="DealerModalLabel">اضافة تاجر</h4>
                </div>
                <form id="form_dealer" action="{{ route('dealers.store') }}" method="post" enctype="multipart/form-data">
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
                            <label>نوع التجارة</label>
                            <select  class="form-control" name="trade_type"  required>
                                <option value="1">طبي</option>
                                <option value="2">موضة</option>
                                <option value="3">الكترونيات</option>
                            </select>
                        </div>

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

$('.dealer').click(function() {

	if($(this).hasClass("update")){
        $('#form_dealer').attr('action', $(this).data('action'))
        $('#form_dealer').append('<input type="hidden" name="_method" value="PUT">')

        $('.modal-title').text('تعديل بيانات تاجر')

        //set data to inputs
        $('#form_dealer input[name="name"]').val($(this).data('name'))
        $('#form_dealer input[name="phone"]').val($(this).data('phone'))
        $('#form_dealer input[name="address"]').val($(this).data('address'))
        $('#form_dealer input[name="longitude"]').val($(this).data('longitude'))
        $('#form_dealer input[name="latitude"]').val($(this).data('latitude'))

    }else {
        $('#form_items').attr('action', '{{ route("dealers.store") }}' )


        $('.modal-title').text('اضافة تاجر')
        
        //delete data from inputs
        $('#form_dealer input[name="name"]').val('')
        $('#form_dealer input[name="phone"]').val('')
        $('#form_dealer input[name="address"]').val('')
        $('#form_dealer input[name="longitude"]').val('')
        $('#form_dealer input[name="latitude"]').val('')
    }

            

})
</script>