<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
<script>
    var baseUrl = $('#base_url').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('textarea#tiny').tinymce({
        height: 500,
        menubar: true,
        plugins: [
           'preview', 'searchreplace', 'autolink', 'directionality', 'advcode', 'visualblocks', 'visualchars', 'fullscreen', 'image', 'link', 'media', 'template', 'codesample', 'table', 'charmap', 'pagebreak', 'nonbreaking', 'anchor', 'insertdatetime', 'advlist', 'lists', 'wordcount', 'tinymcespellchecker', 'a11ychecker', 'mediaembed',  'linkchecker', 'help', 'code', 'autoresize', 'quickbars',
        ],
        toolbar1: 'fullscreen code preview | bold italic underline strikethrough |blocks fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | numlist bullist | forecolor backcolor removeformat | table image media link | outdent indent superscript subscript insertdatetime| codesample ltr rtl | wordcount',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
        image_advtab: true,
        insertdatetime_timeformat: '%H:%M:%S',
        templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
        ],  
    });

    // create pages
    $(document).on('click', '.page-submit', function(){
        let title = $('.title').val();
        !title ? $(`#title-error`).html(`The title field is required.`) : $(`#title-error`).html(``);

        let slug = $('.slug').val();
        !slug ? $(`#slug-error`).html(`The slug field is required.`) : $(`#slug-error`).html(``);

        let description = $('.description').val();
        !description ? $(`#description-error`).html(`The description field is required.`) : $(`#description-error`).html(``);

        let keywords = $('.keywords').val();
        !keywords ? $(`#keywords-error`).html(`The keywords field is required.`) : $(`#keywords-error`).html(``);

        let status = $('.status:checked').val();
        let location = $('.location:checked').val();
        let titleShow = $('.titleShow:checked').val();

        let content =  tinyMCE.activeEditor.getContent();
        !content ? $(`#content-error`).html(`The content field is required.`) : $(`#content-error`).html(``);

        if (!title || !slug || !description || !keywords || !status || !location || !titleShow || !content) {
            return;
        }

        formdata = new FormData();
        formdata.append('title', title);
        formdata.append('slug', slug);
        formdata.append('description', description);
        formdata.append('keywords', keywords);
        formdata.append('status', status);
        formdata.append('location', location);
        formdata.append('titleShow', titleShow);
        formdata.append('content', content);

        $.ajax({
            url: "{{route('page.store')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (res) {
                toastMixin.fire({ title: res.success, icon: 'success' });
                $(".createPages").trigger("reset");

                setTimeout(function() {
                    if (res.redirect_url) {
                        window.location = res.redirect_url;
                    }
                },  1500);
            }, error:function (response) {
            }
        });
    });

    // update pages
    $(document).on('click', '.page-update', function(){

        let id = $('.id').val();

        let title = $('.title').val();
        !title ? $(`#title-error`).html(`The title field is required.`) : $(`#title-error`).html(``);

        let slug = $('.slug').val();
        !slug ? $(`#slug-error`).html(`The slug field is required.`) : $(`#slug-error`).html(``);

        let description = $('.description').val();
        !description ? $(`#description-error`).html(`The description field is required.`) : $(`#description-error`).html(``);

        let keywords = $('.keywords').val();
        !keywords ? $(`#keywords-error`).html(`The keywords field is required.`) : $(`#keywords-error`).html(``);

        let status = $('.status:checked').val();
        let location = $('.location:checked').val();
        let titleShow = $('.titleShow:checked').val();

        let content = tinyMCE.activeEditor.getContent();
        !content ? $(`#content-error`).html(`The content field is required.`) : $(`#content-error`).html(``);

        if (!title || !slug || !description || !keywords || !status || !location || !titleShow || !content) {
            return;
        }

        formdata = new FormData();
        formdata.append('title', title);
        formdata.append('slug', slug);
        formdata.append('description', description);
        formdata.append('keywords', keywords);
        formdata.append('status', status);
        formdata.append('location', location);
        formdata.append('titleShow', titleShow);
        formdata.append('content', content);
        formdata.append('id', id);

        $.ajax({
            url: "{{route('page.update')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (res) {
                toastMixin.fire({ title: res.success, icon: 'success' });
                $(".createPages").trigger("reset");

                setTimeout(function() {
                    if (res.redirect_url) {
                        window.location = res.redirect_url;
                    }
                },  1500);
            }, error:function (response) {
            }
        });
    });

    // delete pages
    $(document).on('click', '.deletePage', function(){
        let id = $(this).data('value');

        $('.loadingShow span').css('display', 'block');
        $('.loadingHide').addClass('d-none');

        $.ajax({
            url: baseUrl + "/admin/delete-page/" + id,
            type: "POST",
            processData: false,
            contentType: false,
            success: function (response) {
                toastMixin.fire({ title: response.danger, icon: 'error' });
                pageList();
            },
        });
    });
    

    // title
    $(document).on('keyup', '.title', function(){
        var title = $(this).val();
        createSlug(title);
    });
    
    // create slug
    function createSlug(title) {
        title = title.toLowerCase();
        title = title.replace(/[^a-zA-Z0-9]+/g,'-');
        $(".slug").val(title);        
    }

     // page Table
     function pageList() {
        $.ajax({
            url: "{{route('page.list')}}",
            type: "GET",
            dataType: "HTML",
            success: function (response) {
                setTimeout(function() {
                    $('.loadingShow span').css('display', 'none');
                    $('.loadingHide').removeClass('d-none');
                },  1500);
                $(".pagetable").html(response);
            }
        });
    }
</script>