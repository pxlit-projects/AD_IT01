using FirstFloor.ModernUI.Windows.Controls;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace ModernUINavigationApp1.Pages
{
    /// <summary>
    /// Interaction logic for Logout.xaml
    /// </summary>
    public partial class Logout : UserControl
    {
        public Logout()
        {
            InitializeComponent();
            MainWindow.Logout();  
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            MainWindow.login = true;

            Login(usernameTextBox.Text, passwordTextBox.Password);

            BBCodeBlock bs = new BBCodeBlock();
            try
            {
                bs.LinkNavigator.Navigate(new Uri("/Pages/Welkom.xaml", UriKind.Relative), this);
            }
            catch (Exception error)
            {
                ModernDialog.ShowMessage(error.Message, FirstFloor.ModernUI.Resources.NavigationFailed, MessageBoxButton.OK);
            }
        }

        private void Login(string username, string password)
        {
            //MessageBox.Show("Username: " + username + "\nPassword: " + password);
        }

        private void TextBox_TextChanged(object sender, TextChangedEventArgs e)
        {

        }
    }
}
