<?php

class Candidate extends Eloquent {

	use SoftDeletingTrait;

	protected $dates = ['voted_at'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'candidates';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['candidate_type_id'];
	
	/**
	 * The fillable property specifies which attributes should
	 * be mass-assignable. This can be set at the class or
	 * instance level.
	 *
	 * @var array
	 */
	protected $fillable = ['nickname', 'full_name', 'slogan', 'picture', 'birthday'];

	/**
	 * Define a relationship com candidato
	 * 
	 * */
	public function votes() {

		return $this->hasMany('CandidateVote');
	}

	/**
	 * Define a relationship com tipo de candidato
	 * 
	 * */
	public function type() {

		return $this->hasOne('CandidateType');
	}

	/**
	 * Faz com que o código seja preenchido com zero a esquerda 
	 *
	 * */
	public function getIdAttribute($value)
	{

		return str_pad($value, 3, "0", STR_PAD_LEFT);
	}

}
