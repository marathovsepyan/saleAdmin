$(document).ready(function() {
    $.toast({
        heading: 'Welcome to Product Data Management System',
        position: 'top-right',
        loaderBg: '#ff6849',
        icon: 'info',
        hideAfter: 3500,
        stack: 6
    })
});
$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.product-table-list-main').on('click', '.delete-product-sweet', function() {
        var data = $(this).data('id');
        thisItem = $(this);
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        },function () {
            $.ajax({
                type: "POST",
                url:'productListDelete',
                data: {id: data},
                success: function( msg ) {
                    swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                    thisItem.parent().parent().hide();
                }
            });
        });
    });

    $('.customer-table-list-main').on('click', '.delete-custemer-sweet', function() {
        var data = $(this).data('id');
        thisItem = $(this);
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        },function () {
            $.ajax({
                type: "POST",
                url:'cusomerListDelete',
                data: {id: data},
                success: function( msg ) {
                    swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                    thisItem.parent().parent().hide();
                }
            });
        });
    });

    $('.brand-table-list-main').on('click', '.delete-brand-sweet', function() {
        var data = $(this).data('id');
        thisItem = $(this);
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        },function () {
            $.ajax({
                type: "POST",
                url:'brandListDelete',
                data: {id: data},
                success: function( msg ) {
                    swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                    thisItem.parent().parent().hide();
                }
            });
        });
    });

    $('.color-table-list-main').on('click', '.delete-color-sweet', function() {
        var data = $(this).data('id');
        thisItem = $(this);
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        },function () {
            $.ajax({
                type: "POST",
                url:'colorListDelete',
                data: {id: data},
                success: function( msg ) {
                    swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                    thisItem.parent().parent().hide();
                }
            });
        });
    });

    $('.form-control-brand').change(function(){
        $('.loading-gif-colors').css('display','block');
        $('.append-color').remove();
        var brandId = $('.form-control-brand').find(":selected").val();
        $.ajax({
            type: "POST",
            url:'/colorListShow',
            data: {
                id: brandId
            },
            success: function( msg ) {
                $('.loading-gif-colors').css('display','none');
                for(var i = 0 ; i< msg.data.length ; i++){
                    $(".form-control-color").append("" +
                        "<option class='append-color' value='"+msg.data[i]['id']+"'>"+msg.data[i]['name']+"</option>" +
                        "");
                }
                console.log(msg.data.sizes);
                $('#add_size').html(msg.sizes);
                $('.selectpicker').selectpicker();
                           // for(var j = 0 ; j< msg.data.length ; j++){
                           //     $(".size-list-product").append("" +
                           //         "<option data-tokens='ketchup mustard' value='"+msg.sizes[j]['id']+"'>"+msg.sizes[j]['size_1']+' '+msg.sizes[j]['size_2']+ ' ' +msg.sizes[j]['size_3']+"</option>" +
                           //         "");
                           // }
            }
        });
    });

    $('.size-table-list-main').on('click', '.delete-size-sweet', function() {
        var data = $(this).data('id');
        thisItem = $(this);
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        },function () {
            $.ajax({
                type: "POST",
                url:'sizeListDelete',
                data: {id: data},
                success: function( msg ) {
                    swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                    thisItem.parent().parent().hide();
                }
            });
        });
    });
    $('.size-table-list-main').on('click', '.delete-season-sweet', function() {
        var data = $(this).data('id');
        thisItem = $(this);
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        },function () {
            $.ajax({
                type: "POST",
                url:'seasonDelete',
                data: {id: data},
                success: function( msg ) {
                    swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                    thisItem.parent().parent().hide();
                }
            });
        });
    });

});
$(document).ready(function() {
    $('#customer-list').DataTable();
} );