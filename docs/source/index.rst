.. toctree::
   :hidden:

   install
   example

===============
pvcValidator Overview
===============

The pvcValidator library creates a common interface and implementation for validating data and producing messages
targeted to end users in the event that the data fails validation.  Most of the library is dedicated to creating a
common interface for testing a piece of data.  The library wraps the php filter_var verb, it wraps pvcRegex objects,
wraps the ctype verbs, and it has a 'MinMaxTester', which is designed to be more strictly typed and more comprehensive
than what you can easily get out of filter_var in terms of testing dates/times, integers and floats.

Note that the ctype testers are locale-aware although they pick up their awareness through the current locale setting
and not through a parameter to a method or an attribute in the class.  Regexes have no awareness of locale.
filter_var is not locale aware either.


Design Points
#############

* the testing part of the library is independent of the messaging part.  So the testing components can be used by a
developer on the inside of an application where you would typically throw an exception. By adding the messaging
layer, you can create language neutral messages (leveraging the pvcMsg library) that can be viewed by end users in
the event an input is invalid.




