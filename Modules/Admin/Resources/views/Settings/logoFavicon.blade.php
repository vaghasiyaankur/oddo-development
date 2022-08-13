<div class="logo-favicon">
    <div class="logo-header d-flex justify-content-between align-items-center mb-5 flex-wrap">
        <h3 class="fs-4 mb-0">Logo and Favicon</h3>
        <a href="javascript:;">
            <button type="submit" class="btn btn-success logo-btn">save</button>
        </a>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <h3 class="logo-title border-bottom fs-5 py-3 px-3"> Logo</h3>
                @if ($logoFavicon->logo)
                    <div class="logo-image mb-4 mt-4">
                        <img src='{{ asset('storage/'.$logoFavicon->logo)}}' width='100px' height='100px'>
                        <a href="javascript:;" class="logo-btn-close btn deleteLogo" data-value="{{$logoFavicon->id}}"><i class="ri-close-line fs-4"></i></a>
                    </div>
                @else
                    <div class="logo-uplod p-3 text-center">
                        <input class="filepond logo" id="file01" type="file" name="filepond" data-max-file-size="3MB"
                            data-max-files="1" />
                    </div>
                @endif
            </div>
            {{-- <a href="javscript:;" class="logoSave">save</a> --}}
        </div>
        <div class="col-lg-6">
            <div class="card">
                <h3 class="logo-title border-bottom fs-5 py-3 px-3"> Favicon</h3>
                @if ($logoFavicon->favicon)
                    <div class="logo-image mb-4 mt-4">
                        <img src='{{ asset('storage/'.$logoFavicon->favicon)}}' width='100px' height='100px'>
                        <a href="javascript:;" class="logo-btn-close btn deleteFavicon" data-value="{{$logoFavicon->id}}"><i class="ri-close-line fs-4"></i></a>
                    </div>
                @else
                    <div class="logo-uplod p-3 text-center">
                        <input class="filepond favicon" id="file02" type="file" name="filepond" data-max-file-size="3MB"
                            data-max-files="1" />
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{-- @if (!isset($logoFavicon)) --}}

    {{-- @endif --}}
</div>

<script>
$(document).ready(function () {
    FilePond.registerPlugin(
        FilePondPluginFileEncode,
        FilePondPluginFileValidateSize,
        FilePondPluginImagePreview
    );

    FilePond.registerPlugin(
        FilePondPluginFileEncode,
        FilePondPluginFileValidateSize,
        FilePondPluginImagePreview
    );

    const fileponLayout = `
        <i class="icon">
            <svg width="40" height="40" viewBox="0 0 81 80" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M51.2347 50.2564L40.9782 40L30.7217 50.2564" stroke="#172B4D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M40.9788 40V63.0769" stroke="#172B4D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M62.4913 56.3849C64.9922 55.0215 66.9679 52.8641 68.1065 50.2532C69.245 47.6423 69.4817 44.7265 68.7791 41.9662C68.0765 39.2058 66.4747 36.758 64.2264 35.0091C61.9781 33.2603 59.2115 32.3099 56.3631 32.308H53.1323C52.3562 29.3061 50.9096 26.5191 48.9013 24.1567C46.8931 21.7943 44.3754 19.9179 41.5376 18.6685C38.6997 17.4192 35.6156 16.8294 32.517 16.9436C29.4184 17.0578 26.3861 17.8729 23.6479 19.3277C20.9097 20.7824 18.5369 22.839 16.7079 25.3428C14.8789 27.8466 13.6414 30.7325 13.0883 33.7834C12.5352 36.8343 12.6809 39.9709 13.5145 42.9574C14.3481 45.9439 15.848 48.7025 17.9012 51.0259" stroke="#172B4D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M51.2347 50.2564L40.9782 40L30.7217 50.2564" stroke="#172B4D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </i>
        <br>
        Drag & Drop your files or <a href="javascript:;" class="border-bottom text-black">Browser</a>
    `;

    const fileponReviewHeight = 200;

    // Select the file input and use create() to turn it into a pond

    FilePondLogo = FilePond.create(document.querySelector("input#file01"), {
        labelIdle: fileponLayout,
        imagePreviewHeight: fileponReviewHeight
    });

    FilePondFavicon = FilePond.create(document.querySelector("input#file02"), {
        labelIdle: fileponLayout,
        imagePreviewHeight: fileponReviewHeight
    });
});
</script>


