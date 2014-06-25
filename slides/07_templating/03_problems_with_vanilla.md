Problems with the vanilla way
-----------------------------
- End up mixing business login and display logic
- View files get very, very busy
- Hard to change variable names
- Multiple sections get unwieldy quickly
- Have to remember to `ob_start()` at the top of each section
    - If you don't you'll get hard-to-debug problems
- Doing stuff like conditionally adding a stylesheet to the `<head>` tag is
  really hard
