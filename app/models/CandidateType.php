<?php

class CandidateType extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'candidate_types';

	/**
	 * Make laravel ignore timestamps
	 *
	 * @var bool
	 */
	public $timestamps = false;

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
	protected $fillable = ['type'];

	/**
	 * Define a relationship com tipo de candidato
	 * 
	 * */
	public function candidates() {

		return $this->belongsToMany('Candidate');
	}

}
