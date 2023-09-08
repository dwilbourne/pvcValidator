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
and it has a 'MinMaxTester', which is designed to be more strictly typed and more comprehensive than what you can
easily get out of filter_var.


Design Points
#############

* the testing part of the library is independent of the messaging part.  So the testing components can be used by a
developer on the inside of an application where you would typically throw an exception. By adding the messaging
layer, you can create language neutral messages (leveraging the pvcMsg library) that can be viewed by end users in
the event an input is invalid.




