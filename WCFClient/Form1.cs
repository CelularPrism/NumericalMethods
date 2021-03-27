using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading;
using System.Windows.Forms;
using System.ServiceModel;
using System.ServiceModel.Description;

namespace WCFClient
{
    public partial class Form1 : Form
    {

        int score = 0;

        public Form1()
        {
            InitializeComponent();
            backgroundWorker1.WorkerReportsProgress = true;
            backgroundWorker1.WorkerSupportsCancellation = true;
        }

        private void button1_Click(object sender, EventArgs e)
        {
            if (backgroundWorker1.IsBusy != true)
            {
                backgroundWorker1.RunWorkerAsync();
            }

            
        }

        private void button2_Click(object sender, EventArgs e)
        {
            if (backgroundWorker1.WorkerSupportsCancellation == true)
            {
                backgroundWorker1.CancelAsync();
            }
        }

        private void backgroundWorker1_DoWork(object sender, DoWorkEventArgs e)
        {
            BackgroundWorker worker = sender as BackgroundWorker;
            for (int i = 1; i <= 10; i++)
            {
                if (worker.CancellationPending == true)
                {
                    e.Cancel = true;
                    break;
                }
                else
                {
                    System.Threading.Thread.Sleep(1000);
                    
                    worker.ReportProgress(i);
                }
            }
            button3.BackColor = Color.Red;

            string sUrlService = "http://127.0.0.1:8000/Service";
            BasicHttpContextBinding pBinding = new BasicHttpContextBinding();
            EndpointAddress pEndpointAddress = new EndpointAddress(sUrlService);
            ServiceReference1.ServiceClient pClient = new ServiceReference1.ServiceClient(pBinding, pEndpointAddress);
            MessageBox.Show(pClient.Method1(Convert.ToString(score)));
        }

        private void backgroundWorker1_ProgressChanged(object sender, ProgressChangedEventArgs e)
        {
            label1.Text = (e.ProgressPercentage.ToString() + "с");
        }

        private void backgroundWorker1_RunWorkerCompleted(object sender, RunWorkerCompletedEventArgs e)
        {
            if (e.Cancelled == true)
            {
                label2.Text = "";
            }
            else if (e.Error != null)
            {
                label2.Text = "Ошибка: " + e.Error.Message;
            }
            else
            {
                label2.Text = "Конец";
            }
        }

        private void button3_Click(object sender, EventArgs e)
        {
            Random random = new Random();
            if (button3.BackColor == Color.Black)
            {
                score = score + 10;
                button3.Location = new Point(random.Next(300), random.Next(70));
                label3.Text = label3.Text.Substring(0, 18) + score;
            }
        }
    }
}
