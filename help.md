install laravel projects with specific version :
composer create-project laravel/laravel7 your-project-name --prefer-dist


Github : 
Open Git Bash.
Change the current working directory to your local project.
Initialize the local directory as a Git repository.
```git
$ git init -b main
```
Add the files in your new local repository. This stages them for the first commit.
```
$ git add .
```
# Adds the files in the local repository and stages them for commit. To unstage a file

Commit the files that you've staged in your local repository.
```
$ git commit -m "First commit"
```
# Commits the tracked changes and prepares them to be pushed to a remote repository. To rem

At the top of your GitHub repository's Quick Setup page, click  to copy the remote repository URL.

In the Command prompt, add the URL for the remote repository where your local repository will be pushed.
```
$ git remote add origin  <REMOTE_URL> 
```
# Sets the new remote
```
$ git remote -v
```
# Verifies the new remote URL

Push the changes in your local repository to GitHub.
```
$ git push origin main
```
# Pushes the changes in your local repository up to the remote repository you specified as the



## Adding changes to remote repository
first you need to add files to be tracked 
```git
 git add <filename>
```
OR
```git
 $ git add --all
```
then after adding your changes you need to commit them as below:
```git
commit -m "commit message here"
```

after committing your changes the comiits will be applied in your local machine you need to push this changes to your remote repository
```git
 git push
```
and now you are done.
 


 #Delete local repository
from your project folder type this command :
 ```git
 $ rm -rf .git
 ```
