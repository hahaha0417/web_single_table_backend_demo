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
@if(Config::get('app.online_script'))
    @if(Config::get('app.debug'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js" integrity="sha512-lOtDAY9KMT1WH9Fx6JSuZLHxjC8wmIBxsNFL6gJPaG7sLIVoSO9yCraWOwqLLX+txsOw0h2cHvcUJlJPvMlotw==" crossorigin="anonymous"></script>
    @else
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" integrity="sha512-3n19xznO0ubPpSwYCRRBgHh63DrV+bdZfHK52b1esvId4GsfwStQNPJFjeQos2h3JwCmZl0/LgLxSKMAI55hgw==" crossorigin="anonymous"></script>
    @endif
    {{-- jquery --}}
    @if(Config::get('app.debug'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
    @else
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    @endif

    {{-- jquery ui --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>

    {{-- jquery slim --}}
	<?php
    /*
    精簡版 沒有$.ajax
    @if(Config::get('app.debug'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.js" integrity="sha512-1lagjLfnC1I0iqH9plHYIUq3vDMfjhZsLy9elfK89RBcpcRcx4l+kRJBSnHh2Mh6kLxRHoObD1M5UTUbgFy6nA==" crossorigin="anonymous"></script>
    @else
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js" integrity="sha512-/DXTXr6nQodMUiq+IUJYCt2PPOUjrHJ9wFrqpJ3XkgPNOZVfMok7cRw6CSxyCQxXn6ozlESsSh1/sMCTF1rL/g==" crossorigin="anonymous"></script>
    @endif
	*/
	?>
    {{-- bootstrap --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js" integrity="sha512-iceXjjbmB2rwoX93Ka6HAHP+B76IY1z0o3h+N1PeDtRSsyeetU3/0QKJqGyPJcX63zysNehggFwMC/bi7dvMig==" crossorigin="anonymous"></script>

    {{-- fontawesome --}}
    {{--  不用加這個，他會改成SVG樣式  --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ==" crossorigin="anonymous"></script> --}}


@else
    <script src="{{\p_ha::Assets("plugin/plugin/npm-modernizr/modernizr.js")}}"></script>

    {{-- jquery --}}
    @if(Config::get('app.debug'))
        <script src="{{\p_ha::Assets("plugin/plugin/jquery/dist/jquery.js")}}"></script>
    @else
        <script src="{{\p_ha::Assets("plugin/plugin/jquery/dist/jquery.min.js")}}"></script>
    @endif



    {{-- jquery ui --}}
    @if(Config::get('app.debug'))
        <script src="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-ui-dist/jquery-ui.js")}}"></script>
    @else
        <script src="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-ui-dist/jquery-ui.min.js")}}"></script>
    @endif

    {{-- jquery slim --}}


    {{-- @if(Config::get('app.debug'))
        <script src="{{\p_ha::Assets("plugin/plugin/jquery/dist/jquery.slim.js")}}"></script>
    @else
        <script src="{{\p_ha::Assets("plugin/plugin/jquery/dist/jquery.slim.min.js")}}"></script>
    @endif --}}


    {{-- bootstrap --}}
    @if(Config::get('app.debug'))
        <script src="{{\p_ha::Assets("plugin/plugin/bootstrap/dist/js/bootstrap.bundle.js")}}"></script>
    @else
        <script src="{{\p_ha::Assets("plugin/plugin/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script>
    @endif


    {{-- fontawesome --}}
    {{-- @if(Config::get('app.debug'))
        <script src="{{\p_ha::Assets("plugin/plugin/fontawesome-free/js/all.js")}}"></script>
    @else
        <script src="{{\p_ha::Assets("plugin/plugin/fontawesome-free/js/all.min.js")}}"></script>
    @endif --}}

@endif
