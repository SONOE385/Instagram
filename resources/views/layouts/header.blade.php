

<div class="header">
    <div class="header-container">
        <div class="row">
            <div class="col-sm-4">
                @if(session("simple_auth"))
                    <a href="{{ route('upload_form') }}" class="camera">
                        <img src="/images/camera.png" width="13%"/>
                    </a>
                @endif
            </div>

            <div class="col-sm-4 text-center">
                <a href="{{ route('image_list') }}">
                    <img src="https://cdn.worldvectorlogo.com/logos/instagram-1.svg" width="56%"/>
                </a>
            </div>

            <div class="icon-area col-sm-4">
                @if(session("simple_auth"))

                    <div id="tooltipIcon" class="icon">
                        <a  href="{{ route('image_list') }}">
                            <img src="/images/icon.jpg" width="25%" style="border-radius: 50%;" />
                        </a>
                        <div id="toolTip-menu">
                            <form method="post" action="{{ url('logout') }}">
                                @csrf 
                                <input type="submit" class="user-infomation-button" value="{{ $user_name }}さん" />
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<hr />