<?php

class QueryBuilder {

  // Single value query builder
  public function single($Name, $SingleValue, $PmcID, $SiteID) {
    return array(
      'listCriteria' => array(
        'ListCriterion' => array(
          'Name' => $Name,
          'SingleValue' => $SingleValue,
          'PmcID' => $PmcID,
          'SiteID' => $SiteID
        )
      )
    );
  }

  // Range value query builder
  public function range($Name, $MinVal, $MaxVal, $PmcID, $SiteID) {
    return array(
      'listCriteria' => array(
        'ListCriterion' => array(
          'Name' => $Name,
          'MinVal' => $MinVal,
          'MaxVal' => $MaxVal,
          'PmcID' => $PmcID,
          'SiteID' => $SiteID
        )
      )
    );
  }

  // Get all data query builder
  public function fetchAll() {
    return array(
      'listCriteria' => array()
    );
  }
}
?>