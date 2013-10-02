[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

<form name="transfer" id="transfer" action="[{ $oViewConf->getSelfLink() }]" method="post">
    [{ $oViewConf->getHiddenSid() }]
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="cl" value="blockmanager_main">
</form>

<form name="sqlfrm" id="sqlfrm" action="[{ $oViewConf->getSelfLink() }]" method="post" enctype="multipart/form-data">
	[{ $oViewConf->getHiddenSid() }]
	<input type="hidden" name="cl" value="blockmanager_main">			
	<input type="hidden" name="fnc" value="saveblocks">

<fieldset>
		<legend>Template Blocks</legend>
		<table cellspacing="0" cellpadding="3" border="0" width="730">
			
			<tr>
				<td class="listheader">Active</td>
				<td class="listheader">Pos.</td>
                <td class="listheader">Module</td>
				<td class="listheader">Template</td>
				<td class="listheader">Block Name</td>
				<td class="listheader">File Name</td>
			</tr>
			[{foreach from=$oView->getTemplateBlocks() item=oBlock}]
				<tr>
					<td class="listitem[{$blMod}]">
					<input type="hidden" name="editval[[{$oBlock->oxid}]][oxactive]" value="0"/>
					<input type="checkbox" name="editval[[{$oBlock->oxid}]][oxactive]" [{if $oBlock->oxactive == 1}]checked="checked"[{/if}] value="1"/></td>
					<td class="listitem[{$blMod}]"><input size="2" type="text" name="editval[[{$oBlock->oxid}]][oxpos]" value="[{$oBlock->oxpos}]"/></td>
					<td class="listitem[{$blMod}]">[{$oBlock->oxmodule}]</td>
                    <td class="listitem[{$blMod}]">[{$oBlock->oxtemplate}]</td>
					<td class="listitem[{$blMod}]">[{$oBlock->oxblockname}]</td>
					<td class="listitem[{$blMod}]">modules/[{$oBlock->oxmodule}]/out/blocks/[{$oBlock->oxfile}].tpl</td>					
				</tr>
				[{if $blMod == 0}][{assign var="blMod" value=2}][{else}][{assign var="blMod" value=""}][{/if}]
			[{/foreach}]
			<tr>
				<td colspan="5" align="right"><input type="submit" value="[{oxmultilang ident="GENERAL_SAVE"}]"></td>
			</tr>
		</table>
</fieldset>

</form>
            

[{include file="bottomnaviitem.tpl"}]

[{include file="bottomitem.tpl"}]