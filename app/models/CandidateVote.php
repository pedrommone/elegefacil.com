<?php

class CandidateVote extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'candidate_votes';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];
	
	/**
	 * The fillable property specifies which attributes should
	 * be mass-assignable. This can be set at the class or
	 * instance level.
	 *
	 * @var array
	 */
	protected $fillable = ['city', 'state', 'gender', 'age'];

	/**
	 * Define a relationship com candidato
	 * 
	 * */
	public function candidate() {

		return $this->belongsTo('Candidate');
	}

}
