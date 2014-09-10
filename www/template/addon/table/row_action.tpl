<nobr>
<a href="/?action={$sBaseAction}_edit&id={$aRow.id}&return={$sReturn|escape:"url"}">
<img src="/image/edit.png" border=0 width=16 align=absmiddle hspace=1/>{"Edit"}</a>
</nobr>

{if $not_delete!=1}
<nobr>
<a href="/?action={$sBaseAction}_delete&id={$aRow.id}&return={$sReturn|escape:"url"}" 
onclick="if (!confirm('{"Are you sure you want to delete this item?"}')) return false;"
>
<img src="/image/delete.png" border=0  width=16 align=absmiddle hspace=1/>{"Delete"}</a>
</a>
</nobr>
{/if}