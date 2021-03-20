<div style="white-space: pre-line;line-height: 1.5;">
	Dear {{ $userName }},
	Your {{ $_SERVER['SERVER_NAME'] }} profile recently viewed.
	Please, see details at {{ user('/') }}
	<a href="{{ user('/') }}">My dashboard</a>
</div>
<br>
{{ $_SERVER['SERVER_NAME'] }}
