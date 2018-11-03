#Functions Guide
The following guide shows the functions that are accessible in the framework together with the parameters they take and response to be expected.

##Database Functions

The following are the functions that can be used to perform database functions

**Create Records**

`DB::create($table,$data);`

**Get Records**

___All Records___

`DB::all($table,$flags[0:default limit of 1000|1:all records without limit]|optional);`

*This returns a maximum of 1000 results*
 
 ___Specific Columns___
 
 `DB::columns($table,array [column1,column2,column3,...]);`
 
 ___Find by id___
 
 `DB::find($table,$id);`
 
 ___Find by column___
 
 `DB::where($table,$column,$condition,$value);`
 
 **Update Records**
 