from tkinter import Tk, Label

window = Tk()

window.title("The window")

l = Label(window, text="Happy")
l.place(x = 400 , y = 400)

window.mainloop()