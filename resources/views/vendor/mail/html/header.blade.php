<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="/storage/images/assets/NEO_2" class="logo" alt="NEO 2022">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
