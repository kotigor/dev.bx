<?php

namespace State;

interface ServiceState
{
	public function activate();
	public function pause();
	public function cancel();

	public function changeState();
}