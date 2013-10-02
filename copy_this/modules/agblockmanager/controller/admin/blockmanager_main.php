<?php

class blockmanager_main extends oxAdminDetails
{
    
    public function render()
    {
        parent::render();
        $this->_aViewData['aBlocks'] = $this->getTemplateBlocks();
        return "blockmanager_main.tpl";
    }
    
    protected $_aTemplateBlocks;
	public function getTemplateBlocks(){
		if(!$this->_aTemplateBlocks){
			$this->_aTemplateBlocks = array();
			$oDb = oxDb::getDb();
			$sQ = "SELECT oxid, oxactive, oxshopid, oxtemplate, oxblockname, oxpos, oxfile, oxmodule FROM oxtplblocks";
			$rs = $oDb->Execute($sQ);
			while(!$rs->EOF){
				$oBlock = new oxStdClass();
				$oBlock->oxid 		= $rs->fields[0];
				$oBlock->oxactive 	= $rs->fields[1];
				$oBlock->oxshopid 	= $rs->fields[2];
				$oBlock->oxtemplate = $rs->fields[3];
				$oBlock->oxblockname = $rs->fields[4];
				$oBlock->oxpos 		= $rs->fields[5];
				$oBlock->oxfile 	= $rs->fields[6];
				$oBlock->oxmodule 	= $rs->fields[7];
				$this->_aTemplateBlocks[] = $oBlock;
				$rs->MoveNext();
			}
		}
		return $this->_aTemplateBlocks;
	}
    
    public function saveblocks(){
		$aEditBlocks = oxConfig::getParameter("editval");
		$oDb = oxDb::getDb();
		foreach($aEditBlocks as $sOxid => $aParams){
			$sQ = "UPDATE oxtplblocks SET ";
			$aUpdates = array();
			foreach($aParams as $key => $value){
				$aUpdates[] = $key . " = " . $oDb->quote($value);  
			}
			$sQ .= implode(",",$aUpdates);
			$sQ .= " WHERE OXID = " . $oDb->quote($sOxid);
			$oDb->Execute($sQ);
		}
		$this->_clearTmp();
		oxUtilsView::getInstance()->addErrorToDisplay('Success!');
	}
    
    protected function _clearTmp($dir=null){
		if(!$dir){
			$oConf = oxConfig::getInstance();
			$dir = $oConf->getConfigParam('sCompileDir').'/';
		} 
		if(!$dh = @opendir($dir)) return;
	    while (false !== ($obj = readdir($dh))) {
	        if($obj=='.' || $obj=='..' || $obj=='.htaccess') continue;
	        if (!@unlink($dir.'/'.$obj)) $this->_clearTmp($dir.'/'.$obj, true);
	    }	
	    closedir($dh);
	}
}
