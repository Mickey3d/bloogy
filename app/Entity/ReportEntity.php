<?php

namespace App\Entity;

use Core\Entity\Entity;


class ReportEntity Extends Entity {
    /**
     * Report id.
     *
     * @var integer
     */
    protected $reportId;

    
    /**
     * Comment id
     *
     * @var integer
     */
    protected $commentID;
	
    /**
     * id of the author's comment.
     *
     * @var string
     */
    protected $comAuthorID;
    
        /**
     * id of the reporter.
     *
     * @var string
     */
    protected $reportByID;
	
	/**
     * date of the Report.
     *
     * @var dateTime
     */
    protected $reportDate;
	

	// GETTERS
	
    public function getReportId() {
        return $this->reportId;
    }

    public function getCommentID() {
        return $this->commentID;
    }

	public function getComAuthorID() {
        return $this->comAuthorID;
    }
    
    public function getReportByID() {
        return $this->reportByID;
    }

	public function getReportDate(){
		return $this->reportDate;
	}



	// SETTERS
    	
    public function setReportId($id) {
        $this->reportId = $id;
        return $this;
    }

    public function setCommentId($id) {
        $this->commentID = $id;
        return $this;
    }
	
    public function setComAuthorID($id) {
        $this->comAuthorID = $id;
        return $this;
    }
    
    public function setReportByID($id) {
        $this->reportByID = $id;
        return $this;
    } 
	
	
}