@forelse ($hotels as $hotel)
<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="share-section mb-5">
            <div class="drag-section justify-content-between flex-wrap">
                <div class="d-flex align-items-center mb-3 mb-lg-0">
                    <img src="{{asset('storage/'.@$hotel->mainPhoto->first()->photos)}}" alt="" class="drag-image">
                    <span>
                        <h2 class="property-subtitle-text">{{$hotel->property_name}}</h2>
                    </span>
                </div>
                <div class="upload-delete-button-step d-flex justify-content-between flex-wrap">
                    <a href="javascript:;" class="white-button-step px-3 py-2 d-flex align-items-center me-2">Albums</a>
                    <a href="javascript:;" class="white-button-step px-3 py-2 d-flex align-items-center me-2">Preview</a>
                    <a href="{{route('edit.proeprty', ['id' => $hotel->UUID])}}"
                        class="white-button-step py-2 d-flex align-items-center me-2 px-3">Edit Property</a>
                    <a href="javascript:;" class="white-button-step px-3 py-2 d-flex align-items-center propertyDelete"
                        data-value="{{ $hotel->UUID }}">Delete</a>
                </div>
            </div>

            {{-- <div class="social-media mt-4 d-flex">
                <div class="social-text mb-0 mr-3">
                    <div class="dog-text">Share with:</div>
                </div>
                <div class="social-icon">
                    <div class="share-with-your-friend social_back">
                        <ul class="share-this mb-0">
                            <li class="share-social-icon mr-2 share-button">
                                <a href="javascript:;" class="share-icon-text">
                                    <img src="https://dev.idratherbewithmydog.net/themes/irbwmd/assets/images/icon/share.svg"
                                        alt=""><span class="share-span">ShareThis</span>
                                </a>
                            </li>
                            <li class="share-social-icon mr-2 position-relative">
                                <a href="javascript:;" class="share-anchor"
                                    data-url="https://dev.idratherbewithmydog.net/dogsite/tn4v3Lh1KB32"
                                    id="dogsite-paste-32" onclick="copyToClipboard('#dogsite-paste-32')">
                                    <img src="https://dev.idratherbewithmydog.net/themes/irbwmd/assets/images/icon/copy.svg"
                                        alt="">
                                </a>
                                <p class="copied-tooltip">Copied</p>
                            </li>
                            <li class="share-social-icon mr-2">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=https://dev.idratherbewithmydog.net/dogsite/tn4v3Lh1KB32"
                                    class="share-anchor" target="_blank">
                                    <img src="https://dev.idratherbewithmydog.net/themes/irbwmd/assets/images/icon/facebook-icon.svg"
                                        alt="">
                                </a>
                            </li>
                            <li class="share-social-icon mr-2">
                                <a href="https://twitter.com/intent/tweet?text=Default+share+text&amp;url=https://dev.idratherbewithmydog.net/dogsite/tn4v3Lh1KB32"
                                    class="share-anchor" target="_blank">
                                    <img src="https://dev.idratherbewithmydog.net/themes/irbwmd/assets/images/icon/twitter-icon.svg"
                                        alt="">
                                </a>
                            </li>

                            <li class="share-social-icon mr-2">
                                <a href="https://wa.me/?text=https://dev.idratherbewithmydog.net/dogsite/tn4v3Lh1KB32"
                                    class="share-anchor" target="_blank">
                                    <img src="https://dev.idratherbewithmydog.net/themes/irbwmd/assets/images/icon/whatsapp.svg"
                                        alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    {{-- <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"></div> --}}
</div>
@empty
{{-- FOR EMPTY TABLE --}}
<main data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1000"
    class="d-flex justify-content-center align-items-center result-main-content border-semidark mt-4" style="    overflow: hidden;">
    <div class="result-main-inner d-flex align-items-center justify-content-center" style="width: 966px;height: 345px;">
        <div class="empty-table w-100 text-center py-5">
            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
            </lord-icon>
            <h4>No records has been added yet.</h4>
            <h6>Add a new Property by simpley clicking the button.</h6>
            <div class="another-c-details mt-4">
                <a href="{{route('property-category')}}" class="btn another-c-d-btn"
                    style="background-color: #6A78C7 !important; color: white;white-space:nowrap;">Add Property</a>
            </div>
        </div>
    </div>
</main>
@endforelse