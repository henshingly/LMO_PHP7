<p align='center' style='font-family:Verdana,arial,helvetica;font-size:10pt'>
<table border= '0' cellspacing='0' align='center'>

<?php foreach ($liga->spieltage as $spTag) { ?>
<tr><td colspan=9 style='font-size=10pt;background-color=#EEEEEE;border-top-style:solid;border-bottom-style:solid;border-width:1px;border-color:#000000';>
<strong>
<?php $spTag->nr.". Spieltag - ".$spTag->vonBisString(); ?>
</strong></td></tr>

<?PHP
			$pcount = 1;
			foreach ($spTag->partien as $partie) {
				$hTore = $partie->hTore;
				$gTore = $partie->gTore;
				if($hTore == -1 and $gTore == -1) {
          $hTore = "__";
          $gTore = "__";
				}
?>
<tr>
	<td style='font-size=10pt;'><?PHP $partie->datumString()." ".$partie->zeitString(); ?></td>
	<td style='font-size=10pt;'><?PHP $partie->heim->name; ?></td><td>-</td>
  <td style='font-size=10pt;'><?PHP $partie->gast->name; ?></td>
  <td align='right' style='font-size=10pt;'><?PHP $hTore; ?></td><td style='font-size=10pt;'>:</td>
  <td align='center' style='font-size=10pt;'><?PHP $gTore; ?></td><td style='font-size=10pt;'></td>
<?PHP
        echo "<td><select class=\"lmoadminein\" name=\"sp_".$spTag->nr."_".$pcount."\">\n";
        for ($sp = 1;$sp <= $liga->spieltageCount();$sp++) {
          echo "<option value=$sp";
          if($spTag->nr==$sp){echo " selected";}
          echo ">".$sp.".Spieltag</option>";
        }
        echo "</select></td>\n";
        echo"</tr>\n";
        $pcount++;
			}
		}
}
?>
</table></p>