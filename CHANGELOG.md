## 1.3.0
### Features and improvements
* A great deal of refactoring has occurred, which paved the way for performance improvements in several areas, such as type deduction.
  * Indexing should be slightly faster.
  * Everything should feel a bit more responsive.
  * Semantic linting should be significantly faster, especially for large files.

### Bugs fixed
* Documentation for built-in functions was escaping underscores with a slash.
* Semantic linting was incorrectly processing unqualified global function names.
* Semantic linting was incorrectly processing unqualified global constant names.
* The status bar was not showing progress when a project index happened through a repository status change.
* Editing a file that did not meet the allowed extensions specified in the project settings still caused it to be added to the index.
* Previously a fix was applied to make FQCN's actually contain a leading slash to clearly indicate that they were fully qualified. This still didn't happen everywhere, which has been corrected now.
* Built-in interfaces no longer have `isAbstract` set to true. They _are_ abstract in a certain sense, but this property is meant to indicate if a classlike has been defined using the abstract keyword. It was also not consistent with the behavior for non-built-in interfaces.
* For method implementations, `implementation.declaringClass` previously pointed to the interface. This has now been changed to point to the class originally implementing the interface, which is consistent with `override.declaringClass`. Note that `implementation.declaringStructure` will still point to the interface.

## 1.2.0
* Initial split from the [php-integrator/atom-base](https://github.com/php-integrator/atom-base) repository. See [its changelog](https://github.com/php-integrator/atom-base/blob/master/CHANGELOG.md) for what changed in older versions.
