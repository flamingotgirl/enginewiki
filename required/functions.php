<?php
	
	function get_sections_recursive() {
		global $arr,$nrcopii;
		
		$query="
		SELECT
			S.id,
			S.name,
			S.pid
		FROM sections S
		WHERE S.deleted = 0";
		
		$result=mysql_query($query) or die(mysql_error().$query);
		while ($line=mysql_fetch_array($result)) {
			$arr[] = $line;
			$par = $line[2];
			$nrcopii[$par] += 1;
		}
	}
	
	function print_menu_tree($idc, $arr, $nrcopii, $level=0) {
        foreach ($arr as $k=>$v) {
            if ($v[2]==$idc) {
                if ($v[2]==0) {
                    $level=0;
                }
                echo "<li id='section-".$v[0]."' class='section'>\n";
                echo "\t<span onclick='sectionDisp(".$v[0].")' class=\"toggle\"><b>+ </b>".ucwords($v[1])."</span>\n";
				
				$array = get_entries_for_parent($v[0]);
				if (is_array($array)) {
					echo "\t\t<ul>\n";
					foreach ($array as $entry_id=>$value) {
						echo "\t\t\t<li>";
						echo str_repeat(" ", $level + 1);
						echo "<a href='#/s/".$v[0]."/a/".$entry_id."/' onclick='contentDisp(".$entry_id.")'>".ucwords($value['name'])."</a>";
						echo "</li>\n";
					}
					echo "\t\t</ul>\n";
				}
				
                if ($nrcopii[$v[0]]>0) { $level++;
					echo "\t\t\t<ul>\n";
                    echo str_repeat(" ", $level + 1);
					print_menu_tree($v[0], $arr, $nrcopii, $level);
					echo "\t\t\t</ul>\n";
					
                }
				echo "</li>\n";
            }
        }
		unset($arr,$nrcopii);
    }
	
	function print_select_tree($idc, $arr, $nrcopii, $level=0) {
        foreach ($arr as $k=>$v) {
            if ($v[2]==$idc) {
                if ($v[2]==0) {
                    $level=0;
                    $_style=" style=\"color:green\"";
                }
                echo "<option value='$v[0]' $_style>";
                for ($i=0; $i<$level; $i++) {
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                }
                echo $v[1]."</option>\n";

                if ($nrcopii[$v[0]]>0) { $level++;
                    print_select_tree($v[0], $arr, $nrcopii, $level);
                }
            }
        }
		unset($arr,$nrcopii);
    }
	
	function map_dirs($path,$level) {
		if(is_dir($path)) {
			if($contents = opendir($path)) {
				while(($node = readdir($contents)) !== false) {
					if($node!="." && $node!="..") {
						for($i=0;$i<$level;$i++) echo "  ";
						if(is_dir($path."/".$node)) echo '+'; else echo ' ';
						echo $node."\n";
						map_dirs("$path/$node",$level+1);
					}
				}
			}
		}
	}
	
	function get($_file) {
        $h = fopen("$_file","r");
        $text = fread($h, 9999);
        fclose($h);
        return $text;
	}
	
	
	
	
	
	
	
?>