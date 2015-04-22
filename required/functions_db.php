<?php
	
	function search() {
		$search     = (isset($_POST["search"])     ? $_POST["search"]     : (isset($_GET["search"])     ? $_GET["search"]     : null));
		$entry_type = (isset($_POST["entry_type"]) ? $_POST["entry_type"] : (isset($_GET["entry_type"]) ? $_GET["entry_type"] : null));
		
		if ($search!='') $_where .= " AND (name LIKE '%$search%' OR description LIKE '%$search%') ";
		if ($entry_type!='') $_where .= " AND E.type='$entry_type'";
		
		$query_string =
		"SELECT
			DISTINCT E.id,
			IFNULL(E.name, (SELECT name FROM entries WHERE id=E.pid)) AS name,
			E.description,
			E.contents,
			E.pid,
			R.section_id
		FROM entries E
		INNER JOIN sections_rel R ON R.entry_id = E.id OR R.entry_id = E.pid
		WHERE 1
		$_where
		AND E.deleted=0
		";
		
		$_query = mysql_query($query_string);
		
		$k = 0;
		while ($_row = mysql_fetch_array($_query)) {
			$array[$k]['id']          = $_row['id'];
			$array[$k]['name']        = $_row['name'];
			$array[$k]['description'] = $_row['description'];
			$array[$k]['contents']    = $_row['contents'];
			$array[$k]['pid']         = $_row['pid'];
			$array[$k]['section_id']  = $_row['section_id'];
			$k++;
		}
		return $array;
	}
	
	function get_entries_for_parent($id) {
		$query = mysql_query(
		"SELECT
			E.id,
			E.name,
			E.description,
			E.contents
			FROM entries E
		INNER JOIN sections_rel R ON R.entry_id = E.id
		WHERE R.section_id = $id AND E.pid = 0 AND E.deleted = 0
		ORDER BY E.name"
		);
		while ($row = mysql_fetch_array($query)) {
			$array[$row['id']]['name'] = $row['name'];
			$array[$row['id']]['description'] = $row['description'];
			$array[$row['id']]['contents'] = $row['contents'];
		}	
		return $array;
	}
	
	function get_entries_for_js_search() {
		$_query = mysql_query("SELECT id, name, description FROM entries WHERE deleted = 0");
		while ($_row = mysql_fetch_array($_query)) {
			if ($_row['name']!='') {
				$js_output .= '{id:'.$_row['id'].',text:"'.$_row['name'].'"},';
				$js_output .= '{id:'.$_row['id'].',text:"'.$_row['description'].'"},';
			}
		}
		return $js_output;
	}
	
	function add_section() {
		$section_id  = (isset($_POST["section_id"])  ? $_POST["section_id"]  : null);
		$new_section = (isset($_POST["new_section"]) ? $_POST["new_section"] : null);
		
		mysql_query("INSERT INTO sections SET name='$new_section', pid='$section_id'")
		or die(mysql_error());
	}
	
	function get_sections() {
		$_query = mysql_query("SELECT id, name, pid FROM sections WHERE deleted = 0");
		
		$k = 0;
		while ($_row = mysql_fetch_array($_query)) {
			$array[$k]['id']   = $_row['id'];
			$array[$k]['pid']  = $_row['pid'];
			$array[$k]['name'] = $_row['name'];
			$k++;
		}
		return $array;
	}
	
	function get_section_name($id) {
		$_query = mysql_query("SELECT name FROM sections WHERE id = $id");
		
		$_row = mysql_fetch_array($_query);
		return $_row['name'];
	}
	
	function get_entries ($type="m") {
		$query_string =
		"SELECT
			E.id,
			E.name,
			E.description,
			E.contents,
			E.pid,
			R.section_id
		FROM entries E
		INNER JOIN sections_rel R ON R.entry_id = E.id OR R.entry_id = E.pid
		WHERE E.pid = 0 AND E.type = '$type' AND E.deleted = 0";
		
		$_query = mysql_query($query_string);
		
		$k = 0;
		while ($_row = mysql_fetch_array($_query)) {
			$array[$k]['id']          = $_row['id'];
			$array[$k]['name']        = $_row['name'];
			$array[$k]['description'] = $_row['description'];
			$array[$k]['contents']    = $_row['contents'];
			$array[$k]['pid']         = $_row['pid'];
			$array[$k]['section_id']  = $_row['section_id'];
			$k++;
		}
		return $array;
	}
	
	function get_entry ($id) {
		$_query = mysql_query(
		"SELECT
			name,
			description,
			contents,
			pid
		FROM entries
		WHERE id = '$id' AND deleted = 0"
		);
		
		$k = 0;
		while ($_row = mysql_fetch_array($_query)) {
			$array[$k]['id']          = $id;
			$array[$k]['description'] = $_row['description'];
			$array[$k]['contents']    = $_row['contents'];
			$array[$k]['name']        = $_row['name'];
			$array[$k]['pid']         = $_row['pid'];
			$k++;
		}
		
		$_query = mysql_query(
		"SELECT
			id,
			name,
			description,
			contents,
			pid
		FROM entries
		WHERE pid = '$id' AND deleted = 0
		ORDER BY id"
		);
		while ($_row = mysql_fetch_array($_query)) {
			$array[$k]['id']          = $_row['id'];
			$array[$k]['description'] = $_row['description'];
			$array[$k]['contents']    = $_row['contents'];
			$array[$k]['name']        = $_row['name'];
			$array[$k]['pid']         = $_row['pid'];
			$k++; 
		}
		return $array;
	}
	
	function get_entry_contents($id) {
		$_query = mysql_query(
		"SELECT
			name,
			description,
			contents,
			type,
			pid
		FROM entries
		WHERE id = '$id' AND deleted = 0"
		);
		$_row = mysql_fetch_array($_query);
		$array['description'] = $_row['description'];
		$array['contents']    = $_row['contents'];
		$array['name']        = $_row['name'];
		$array['type']        = $_row['type'];
		$array['id']          = $id;
		$array['pid']         = $_row['pid'];
		return $array;
	}
	
	function get_section_id($entry_id) {
		$query = mysql_query("SELECT section_id FROM sections_rel WHERE entry_id=$entry_id");
		$row = mysql_fetch_array($query);
		return $row[0];
	}

	function add_entry() {
		$description = (isset($_POST["description"]) ? $_POST["description"] : null);
		$contents    = (isset($_POST["contents"])    ? $_POST["contents"]    : null);
		$name        = (isset($_POST["name"])        ? $_POST["name"]        : null);
		$section_id  = (isset($_POST["section_id"])  ? $_POST["section_id"]  : null);
		$type        = (isset($_POST["type"])        ? $_POST["type"]        : null);
		
		mysql_query(
		"INSERT INTO entries SET
			name        = '$name',
			description = '$description',
			contents    = '$contents',
			pid         = 0,
			type        = '$type',
			added_at    = UNIX_TIMESTAMP(NOW())"
		);
		$last_id = mysql_insert_id();
		mysql_query("INSERT INTO sections_rel SET section_id = $section_id, entry_id = $last_id");
		return $last_id;
	}
	
	function edit_entry() {
		$description     = (isset($_POST["description"])     ? $_POST["description"]     : null);
		$contents        = (isset($_POST["contents"])        ? $_POST["contents"]        : null);
		$section_id      = (isset($_POST["section_id"])      ? $_POST["section_id"]      : null);
		$name            = (isset($_POST["name"])            ? $_POST["name"]            : null);
		$parent_entry_id = (isset($_POST["parent_entry_id"]) ? $_POST["parent_entry_id"] : null);
		$type            = (isset($_POST["type"])            ? $_POST["type"]            : null);
		
		if ($_POST['entry_id']!=0) {
			mysql_query(
			"UPDATE entries SET
				name        = '$name',
				description = '$description',
				contents    = '$contents',
				type        = '$type',
				modified_at = UNIX_TIMESTAMP(NOW())
			WHERE id='".$_POST['entry_id']."'"
			);
			return $_POST['entry_id'];
		}
		else {
			mysql_query(
			"INSERT INTO entries SET
				description = '$description',
				contents    = '$contents',
				pid         = '".$_POST['pid']."',
				added_at    = UNIX_TIMESTAMP(NOW())"
			);
			$last_id = mysql_insert_id();
			return $last_id;
		}
	}
	
	function delete_entry($id,$pid) {
		$query = mysql_query("UPDATE entries SET deleted=1 WHERE id=$id");
		//if ($pid==0) $query = mysql_query("DELETE FROM sections_rel WHERE entry_id=$id");
	}
	function delete_section($id) {
		$query = mysql_query("UPDATE sections SET deleted=1 WHERE id=$id");
		//if ($pid==0) $query = mysql_query("DELETE FROM sections_rel WHERE entry_id=$id");
	}


?>