<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table   = "hd_subject";
    public $timestamps = true;

    public function getSubjectDetail()
    {
        $subject = $this->select('hd_user.uname', 'hd_user.targetprofession', 'hd_subject.studentid', 'hd_subject.id', 'hd_subject.name', 'hd_subject.status')
            ->join('hd_user', 'hd_subject.studentid', '=', 'hd_user.id')
            ->where('hd_subject.teacherid', session()->get('userid'))
            ->where('hd_subject.status', 1)
            ->get();
        $detail = [];
        foreach ($subject as $k => $v) {
            $detail[$k]['uname']            = $v->uname;
            $detail[$k]['studentid']        = $v->studentid;
            $detail[$k]['name']             = $v->name;
            $detail[$k]['status']           = $v->status;
            $detail[$k]['targetprofession'] = $v->targetprofession;
            $detail[$k]['subject_id']       = $v->id;
            $subjectDetail                  = SubjectDetail::where('subject_id', $v->id)->get();
            $detail[$k]['detail']           = [];
            foreach ($subjectDetail as $k1 => $v1) {
                $detail[$k]['detail'][] = ['date' => $v1->date, 'content' => $v1->content, 'status' => $v1->status, 'detailid' => $v1->id];
            }
        }
        return $detail;
    }

    public function getSubject()
    {
        $subject = Subject::select('hd_user.uname', 'hd_subject.teacherid', 'hd_subject.studentid', 'hd_subject.id', 'hd_subject.name')
            ->join('hd_user', 'hd_subject.teacherid', '=', 'hd_user.id')
            ->where('hd_subject.status', 1)
            ->where('hd_subject.studentid', session()->get('userid'))
            ->get();
        $detail = [];
        foreach ($subject as $k => $v) {
            $detail[$k]['uname']      = $v->uname;
            $detail[$k]['studentid']  = $v->studentid;
            $detail[$k]['name']       = $v->name;
            $detail[$k]['subject_id'] = $v->id;
            $subjectDetail            = SubjectDetail::where('subject_id', $v->id)->where('status', '>', 0)->get();
            $detail[$k]['detail']     = [];
            foreach ($subjectDetail as $k1 => $v1) {
                $detail[$k]['detail'][] = ['date' => $v1->date, 'content' => $v1->content, 'status' => $v1->status, 'detailid' => $v1->id];
            }
        }
        return $detail;
    }
}
