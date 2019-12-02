<?php


function getUserTypeInfo ($dbRoleParam)
{
	switch ($dbRoleParam) {
		case ADMIN:
		return	 'Администратор';
			break;
		case TEACHER:
		return	 'Преподаватель';
			break;
		case STUDENT:
		return	 'Студент';
			break;
	}
}