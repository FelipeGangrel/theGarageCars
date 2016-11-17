<?php

	include_once('../../inc/includes.php');

	$aColumns = array('MOD_ID', 'FAB_NOME', 'MOD_NOME_COMPLETO');

	/* Indexed column (used for fast and accurate table cardinality) */
	$sIndexColumn = "MOD_ID";

	/* DB table to use */
	 $sTable = "carro_modelo";

	 /* Database connection information */

    $gaSql['user']       = $ssp['user'];
    $gaSql['password']   = $ssp['password'];
    $gaSql['db']         = $ssp['db'];
    $gaSql['server']     = $ssp['server'];

	/*
	 * MySQL connection
	 */
	$gaSql['link'] =  mysql_pconnect( $gaSql['server'], $gaSql['user'], $gaSql['password']  ) or
		die( 'Could not open connection to server' );

	mysql_select_db( $gaSql['db'], $gaSql['link'] ) or
		die( 'Could not select database '. $gaSql['db'] );


	/*
	 * Paging
	 */
	$sLimit = "";
	if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
	{
		$sLimit = "LIMIT ".mysql_real_escape_string( $_GET['iDisplayStart'] ).", ".
			mysql_real_escape_string( $_GET['iDisplayLength'] );
	}


	/*
	 * Ordering
	 */
	if ( isset( $_GET['iSortCol_0'] ) )
	{
		$sOrder = "ORDER BY  ";
		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
		{
			if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
			{
				$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
				 	".mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
			}
		}

		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == "ORDER BY" )
		{
			$sOrder = "";
		}
	}


	/*
	 * Filtering
	 * NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here, but concerned about efficiency
	 * on very large tables, and MySQL's regex functionality is very limited
	 */
	$sWhere = "";
	if ( $_GET['sSearch'] != "" )
	{
		$sWhere = "WHERE (";
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
		}
		$sWhere = substr_replace( $sWhere, "", -3 );
		$sWhere .= ')';
	}

	/* Individual column filtering */
	for ( $i=0 ; $i<count($aColumns) ; $i++ )
	{
		if ( $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
		{
			if ( $sWhere == "" )
			{
				$sWhere = "WHERE ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
		}
	}


	/*
	 * SQL queries
	 * Get data to display
	 */

	if($sWhere){

		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
			FROM  $sTable AS model 
				LEFT JOIN carro_fabricante AS fab ON (fab.FAB_ID = model.FAB_ID)
			$sWhere AND model.MOD_ID <> 0
			$sOrder
			$sLimit
		";

	}else{

		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
			FROM  $sTable AS model  
				JOIN carro_fabricante AS fab ON (fab.FAB_ID = model.FAB_ID)
			$sOrder
			$sLimit
		";

	}

	// $sQuery = "
	// 	SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
	// 	FROM  $sTable
	// 	$sWhere
	// 	$sOrder
	// 	$sLimit
	// ";

	array_push($aColumns, 'botao');

	mysql_set_charset("utf8");

	$rResult = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());

	/* Data set length after filtering */
	$sQuery = "
		SELECT FOUND_ROWS()
	";
	$rResultFilterTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
	$iFilteredTotal = $aResultFilterTotal[0];

	/* Total data set length */
	$sQuery = "
		SELECT COUNT(".$sIndexColumn.")
		FROM   $sTable
	";
	$rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$aResultTotal = mysql_fetch_array($rResultTotal);
	$iTotal = $aResultTotal[0];


	/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);


	while ( $aRow = mysql_fetch_array( $rResult ) ) {
		$row = array();
		for ( $i=0 ; $i<count($aColumns) ; $i++ ) {
			if ( $aColumns[$i] == "botao" )	{

				$row[] = ($aRow[ $aColumns[$i] ]!="") ? '-' : '<a href="modelo.php?c='.$aRow[ $aColumns[0] ].'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Editar</a>';

			} else if ( $aColumns[$i] != ' ' ) {
				/* General output */
				$row[] = $aRow[ $aColumns[$i] ];

			}

		}


		// array_push($row, '<a href="#">teste</a>');

		$output['aaData'][] = $row;

	}

	echo json_encode( $output );
	// print_r($output);
?>
