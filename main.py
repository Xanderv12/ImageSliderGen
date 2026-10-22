import sys
import argparse # Used to grab the php output from the form and convert it into variables for python to use
import os # used to join paths and not hard code file paths
import shutil # Used to copy template files and move the directory and its contents after creation


def generatorFiles(title, imgURL1, imgURL2): # This function will operate similary to the bookreader script
    #--------------------Global Varibales--------------------
    templateFolder = "templates"
    htmlFile = "index.html"
    jsFile = "main.js"
    cssFile = "style.css"

    # Pathes to access HTML, Javascript, & CSS template
    htmlPath = os.path.join(templateFolder, htmlFile)
    jsPath = os.path.join(templateFolder, jsFile) 
    cssPath = os.path.join(templateFolder, cssFile)

    htmlDest = os.path.join(title, htmlFile)
    jsDest = os.path.join(title, jsFile)
    cssDest = os.path.join(title, cssFile)
    
    #--------------------Create Directory--------------------
    try:
        os.makedirs(f'{title}')
        print("Directory created successfully.")
    except FileExistsError:
        print("Directory already exists.")

    #--------------------Copy Template Files--------------------
    # Copy the CSS file into the newly created directory
    if os.path.exists(cssDest):
        print("CSS file already exists in the directory.")
    else:
        shutil.copy(cssPath, title)
        print("CSS file copied successfully.")

    # Copy the Javascript file into the newly created directory
    if os.path.exists(jsDest):
        print("JavaScript file already exists in the directory.")
    else:
        shutil.copy(jsPath, title)
        print("JavaScript file copied successfully.")

    #--------------------Create HTML File--------------------
    if os.path.exists(htmlDest):
        print("HTML file already exists in the directory.")
    else:
        # Read the HTML template and replace placeholders with actual values
        with open(htmlPath, 'r', encoding='utf-8') as htmlFile:
            htmlContent = htmlFile.read()
            htmlContent = htmlContent.replace('{{imgURL1}}', imgURL1)
            htmlContent = htmlContent.replace('{{imgURL2}}', imgURL2)

        # Write the modified HTML content to the destination file
        with open(htmlDest, 'w', encoding='utf-8') as destFile:
            destFile.write(htmlContent)
            print("HTML file created successfully.")

"""
if __name__ == "__main__":
    if len(sys.argv) > 1:
        parser = argparse.ArgumentParser(description="PHP Form Data")
        parser.add_argument("title")
        parser.add_argument("imgURL1")
        parser.add_argument("imgURL2")

        
        args = parser.parse_args()
        success, message = generatorFiles(
            args.title, args.imgURL1, args.imgURL2
        )
        print(message)
        sys.exit(0 if success else 1)
"""
#--------------------Test Values--------------------
temp1 = "over"
temp2 = "the"
temp3 = "rainbow"
generatorFiles(temp1, temp2, temp3)