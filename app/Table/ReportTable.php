<?php
namespace App\Table;

use Core\Table\Table;

/**
 * Class ReportTable -> model ReportEntity
 
 */
class ReportTable extends Table{

    /**
     * @var string $table name 
     */
    protected $table = 'reports';
 
	/**
	 * Add a report
     *
	 * @param int $comId comment id
	 * @param int $usrId user id
     *
	 * @return boolean the result of the query
	 */
	public function add($comID, $authorID){
		
		$request = [
			'commentID' => $comID,
			'comAuthorID' => $authorID,
            'reportByID' => $_SESSION['auth']
		];			
		
		$res = $this->create($request);
		
		return $res;				
	}
	
	/**
	 * Cancel report (delete)
     *
	 * @param int $reportID -> report id
     *
	 * @return boolean
	 */
	public function cancel($reportID){
		
		$res = $this->delete($reportID);				
		
		return $res;		
	}
	
	/**
	 * Test if a report exists for this comment and the current user
	 * @param int $comID comment id
	 * @param int $usrId user id
	 * @return int/false the report id if exist or false.
	 */	
	public function isReported($comID, $userID){
		
		$report = $this->query("		
		SELECT id AS reportId
		FROM reports
		WHERE commentID = ? AND reportByID = ?" , [$comID,$userID], true);
		
		if ($report){
			return $report->getReportId();
		} else {
			return false;
		}		
	}

	/**
	 * return count of the total of reports for a comment
	 * @param int $commentId -> comment id
     * @return int 
	 */
	public function totalReported ($commentId){
		
		$reports = $this->query("		
		SELECT id AS reportId
		FROM reports
		WHERE commentID = ?" , [$commentId]);		
		
		if ($reports){
			return count($reports);
		} else {
			return 0;
		}
	}
}