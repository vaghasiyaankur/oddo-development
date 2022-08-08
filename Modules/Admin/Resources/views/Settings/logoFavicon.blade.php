<div class="logo-favicon">
    <h3 class="mb-5 fs-4">Logo and Favicon</h3>
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
        <a href="javascript;" class="btn logo-btn">save</a>
    {{-- @endif --}}
</div>


