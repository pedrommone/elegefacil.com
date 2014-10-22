<?php

class Candidate extends Eloquent {

	use SoftDeletingTrait;

	protected $dates = ['voted_at'];
	protected $appends = ['vote_number'];

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
	protected $hidden = ['candidate_type_id', 'party_id'];
	
	/**
	 * The fillable property specifies which attributes should
	 * be mass-assignable. This can be set at the class or
	 * instance level.
	 *
	 * @var array
	 */
	protected $fillable = ['nickname', 'full_name', 'slogan', 'picture', 'birthday', 'party_id', 'candidate_type_id'];

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
	 * Define a relationship com tipo de candidato
	 * 
	 * */
	public function party() {

		return $this->belongsTo('Party');
	}

	/**
	 * Faz com que o código seja preenchido com zero a esquerda 
	 *
	 * */
	public function getIdAttribute($value)
	{

		return str_pad($value, 3, "0", STR_PAD_LEFT);
	}

	/**
	 * Faz com que o código seja preenchido com zero a esquerda 
	 *
	 * */
	public function getPartyIdAttribute($value)
	{

		return str_pad($value, 2, "0", STR_PAD_LEFT);
	}

	/**
	 * Concatena o partido e o código para chegar um número de 5 caracteres
	 *
	 * */
	public function getVoteNumberAttribute()
	{

		return $this->party_id . $this->id;
	}

}
