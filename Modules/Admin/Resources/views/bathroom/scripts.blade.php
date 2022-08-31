<script>
     $(document).ready(function(){

        var baseUrl = $('#base_url').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        (async () => {
            const response = await fetch(
                'https://unpkg.com/codethereal-iconpicker@1.2.1/dist/iconsets/bootstrap5.json')
            const result = await response.json()

            const iconpicker = new Iconpicker(document.querySelector(".iconpicker"), {
                icons: result,
                showSelectedIn: document.querySelector(".selected-icon"),
                searchable: true,
                selectedClass: "selected",
                containerClass: "my-picker",
                hideOnSelect: true,
                fade: true,
                defaultValue: 'bi-search',
            });

            iconpicker.set() // Set as empty
        })();

        function  iconPickerEdit(iconSelect){
            (async () => {
                const response = await fetch(
                    'https://unpkg.com/codethereal-iconpicker@1.2.1/dist/iconsets/bootstrap5.json')
                const result = await response.json()

                const iconpicker = new Iconpicker(document.querySelector(".iconPicker"), {
                    icons: result,
                    showSelectedIn: document.querySelector(".selectedIcon"),
                    searchable: true,
                    selectedClass: "selected",
                    containerClass: "my-picker",
                    hideOnSelect: true,
                    fade: true,
                    defaultValue: iconSelect,
                    // valueFormat: val => `bi ${val}`
                });

                iconpicker.set(iconSelect) // Set as empty
                // iconpicker.set('bi-alarm') // Reset with a value
            })();
        }

        $(document).on('click', '.submitForm', function(){
            let item = $('.item').val();
            !item ? $(`#item-error`).html(`The item field is required.`) : $(`#item-error`).html(``);

            let bathroomIcon = $('.bathroomIcon').val();
            !bathroomIcon ? $(`#bathroomIcon-error`).html(`The bathroomIcon field is required.`) : $(`#bathroomIcon-error`).html(``);

            if (!item || !bathroomIcon) {
                return;
            }

            $('.loadingShow span').css('display', 'block');
            $('.loadingHide').addClass('d-none');

            formdata = new FormData();
            formdata.append('item', item);
            formdata.append('bathroomIcon', bathroomIcon);


            $.ajax({
                url: "{{route('add.bathroom')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (response) {
                    $(".bathroomItemForm").trigger("reset");
                    bathroomList();
                    toastMixin.fire({ title: response.success, icon: 'success' });
                    setTimeout(function() {
                        $('.loadingShow span').css('display', 'none');
                        $('.loadingHide').removeClass('d-none');
                    },  1500);
                }, error:function (response) {
                        $('.loadingShow span').css('display', 'none');
                        $('.loadingHide').removeClass('d-none');
                    $('#item-error').text(response.responseJSON.errors.item);
                }
            });
        });

        $(document).on('click', '.edit-item', function(){
            let item = $(this).data("value");
            $('.edit_div').show();
            $('.edit_div').removeClass("d-none");
            $('.create_div').hide();
            $(".editItem").val(item.item);
            $(".edit_id").val(item.UUID);

            var iconSelect = item.icon;
            iconPickerEdit(iconSelect);
        });

        $(document).on('click', '.UpdateSubmitForm', function(){
            let id = $('.edit_id').val();
            let item = $('.editItem').val();
            !item ? $(`#editItem-error`).html(`The item field is required.`) : $(`#editItem-error`).html(``);

            let bathroomIcon = $('.editBathroomIcon').val();
            !bathroomIcon ? $(`#editBathroomIcon-error`).html(`The bathroomIcon field is required.`) : $(`#editBathroomIcon-error`).html(``);

            if (!item || !bathroomIcon) {
                return;
            }
            formdata = new FormData();
            formdata.append('item', item);
            formdata.append('bathroomIcon', bathroomIcon);

            $('.loadingShow span').css('display', 'block');
            $('.loadingHide').addClass('d-none');



            $.ajax({
                url: baseUrl + "/admin/update-bathroom/" + id,
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (response) {
                    $(".editBathroomItemForm").trigger("reset");
                    $('#editItem-error').html('');
                    bathroomList();
                    toastMixin.fire({ title: response.success, icon: 'success' });
                    setTimeout(function() {
                        $('.loadingShow span').css('display', 'none');
                        $('.loadingHide').removeClass('d-none');
                    },  1500);
                }, error:function (response) {
                        $('.loadingShow span').css('display', 'none');
                        $('.loadingHide').removeClass('d-none');
                    $('#editItem-error').text(response.responseJSON.errors.item);
                }
            });
        });

        $(document).on('change', '.bathroomStatus', function(){
            var id = $(this).data('id');
            var status = $(this).data('value');

            formdata = new FormData();
            formdata.append('status', status);
            formdata.append('id', id);

            $.ajax({
                url: "{{route('status.bathroom')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (response) {
                    bathroomList();
                },
            });
        });

        $(document).on('click', '.bathroomDetele', function(){
            var id = $(this).data('value');

            $('.loadingShow span').css('display', 'block');
            $('.loadingHide').addClass('d-none');

            $.ajax({
                url: baseUrl + "/admin/delete-bathroom/" + id,
                type: "POST",
                processData: false,
                contentType: false,
                success: function (response) {
                    toastMixin.fire({ title: response.danger, icon: 'error' });
                    bathroomList();
                    setTimeout(function() {
                        $('.loadingShow span').css('display', 'none');
                        $('.loadingHide').removeClass('d-none');
                    },  1500);
                },
            });

        });

        function bathroomList(){
            $.ajax({
                url: "{{route('bathroom.list')}}",
                type: "GET",
                dataType: "HTML",
                success: function (response) {
                    $(".bathroom-list").html(response);
                }
            });
        }
     });
</script>
