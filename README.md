# Contact Application

**NOTE: Create database name crudoperation and add crudoperation.sql in that database.**


Description:
	Page from user can register.
		First name (text), Last name(text), Valid Email Id(text), Gender (radio button), Profession (Dropdown, 1. Private, Goverment, Other), Password, Confirm Password (conform pwd and pwd must match).
		All form field must have validations.
		First and Last name can accept only alpha and number, no special character allowed.
		Email id should be valid.
		Gender must selected.
		Profession must selected.
		Password should be atleast 8 in length and must contains one special character.
	Page from user can login.
		User can login by email id and password.

Once login user must land on Dashboard page.
After login, user can see below things on the screen.
	Links appear to the user.
  
	1. Dashboard 
	2. Show my all contacts. 
	3. Add new contact
	4. Logout
	5. My profile
	
	1. Dashboard page
		- should contains only latest 5 contacts.
		- Contacts list have edit and delete button which can do appropariate actions.
		- On delete and update success/error message show on the screen.
		- Provide link view beside update and delete button, on view only user contact data will show in table format.
	2. Show my all contacts page
		- Show all added contacts by user.
		- Must have pagination on this page.
		- On a single page only 7 records shown and on page next 7 and so on.
		- Contacts list have edit and delete button which can do appropariate actions.
		- On delete and update success/error message show on the screen.
		- Provide link view beside update and delete button, on view only user contact data will show in table format.
	3. Add new contact page.
		- LoggedIn use can add new contact to his/her list.
		Firt name of contact, Last name, email id, phone number, Gender, Address line 1, Address line 2, State.
		All above fields must have validations.
	4. Logout
		- On click of logout, user must be logged out from the application and redirected to the login page.
	5. My Profile
		- User can see his/her own details but can not update.
