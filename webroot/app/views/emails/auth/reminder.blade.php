<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h1>Password Reset</h1>

		<div>
			To reset your password, complete this form: {{ URL::to('password/reset', array($token)) }}.
		</div>
	</body>
</html>
