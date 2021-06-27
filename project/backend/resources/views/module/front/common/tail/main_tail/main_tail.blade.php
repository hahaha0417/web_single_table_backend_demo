{{-- 原始 : hahaha --}}
{{-- 維護 :  --}}
{{-- 指揮 :  --}}
{{-- ---------------------------------------------------------------------------------------------- --}}
{{-- 決定 : name --}}
{{-- 
    ----------------------------------------------------------------------------
    說明 : 
    ----------------------------------------------------------------------------   
    
    ----------------------------------------------------------------------------
--}}
{{-- ---------------------------------------------------------------------------------------------- --}}


<div class="footer_bar" id="footer_bar">
    <div> 
        <a href="#" title="iTW" class="logo" style="display: table;margin:auto;">
            <img data-src="{{asset("image/iTW.png")}}" src="#" alt="hahaha" width="100px" height="100px" class="lazyload" ></img>
        </a>
        <div>
            <ul class="reset">
                    @foreach($tail as $key => $value)
                    <li class="reset">
                        <a href="{{$value['url']}}" title="{{$value['title']}}" data-tooltip="hide">{{$value['content']}}
                        </a>
                    </li>
                @endforeach
                {{--  <li class="reset">
                    <a href="{{$tail['url']}}" title="{{$tail['title']}}" data-tooltip="hide">{{$tail['content']}}
                    </a>
                </li>  --}}
            </ul>
        </div>
    </div>
</div>

<footer>            
    <div class="copyright"> 
        <span>Copyright ©hahaha 個人製作
        </span> 
        <span>All Rights Reserved. &nbsp;
        </span> 
        <a href="#" title="網頁設計 hahaha" target="_blank">Design by hahaha
        </a>
    </div>        
</footer>